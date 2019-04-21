pipeline {
  agent any
  stages {
    stage('BUILD') {
      steps {
        sh 'docker build -t app:test .'
      }
    }
    stage('TEST') {
      steps {
        sh 'docker run --rm --name app -id -p 80:80 app:test'
        sh '/bin/nc -vz localhost 80'
      }
      post {
        sh 'docker container stop app '
      }
    }
    
  }
}