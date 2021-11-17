

##Run the project using php built in server

composer create-project --prefer-dist yiisoft/yii2-app-advanced learning

php init (choose dev and choose initialize)

php yii migrate

php yii serve --docroot="frontend/web/"

##Run the project using docker

docker compose up -d

php init (choose dev and choose initialize)

Frontend http://localhost:20080/

Backend: http://localhost:21080/