pipeline {
    agent any

    environment {
        DOCKERHUB_CREDENTIALS = '9f4187c3-8181-4d40-81d7-513dc9f140ce'
        GMAIL_USERNAME = credentials('29fb0417-d8d3-40c1-a4f1-fe9b8c504e74')
        GMAIL_PASSWORD = credentials('23b5fd3b-78ad-4112-b261-3bc99058533e')
        STMP_HOST = credentials('520aa1a5-62c2-4e85-b6b3-c14cb7963ad8')
        SMTP_PORT = credentials('5bc71dbd-2e39-4c4c-b0cd-3630b433f294')
        
    }
    stages {
        stage('Remove old build'){
            steps{

                sh 'docker stop mailer || true'
                sh 'docker rm mailer || true'
                sh 'docker system prune -af'
            }
        }
        stage('Build') {
            steps {
                // Checkout source code
                checkout scm

                // Build Docker image
                sh 'docker build -t mailer .'
            }
        }
        stage('Push to Docker Hub') {
            steps {

            withCredentials([usernamePassword(credentialsId: DOCKERHUB_CREDENTIALS, usernameVariable: 'DOCKERHUB_USERNAME', passwordVariable: 'DOCKERHUB_PASSWORD')])
           {
                    sh 'docker login -u $DOCKERHUB_USERNAME -p $DOCKERHUB_PASSWORD'

                    // Tag Docker image
                    sh 'docker tag mailer joemuldowney/mailer-portfolio'

                    // Push Docker image to Docker Hub
                    sh 'docker push joemuldowney/mailer-portfolio'
           }
          }
        }
        stage('Deploy') {
            steps {
                    sh 'docker run -d -p 8008:80 --name mailer \
                    -e GMAIL_USERNAME=$GMAIL_USERNAME \
                    -e GMAIL_PASSWORD=$GMAIL_PASSWORD \
                    -e STMP_HOST=$STMP_HOST \
                    -e SMTP_PORT=$SMTP_PORT \
                    joemuldowney/mailer-portfolio'

            }
        }
    }
}