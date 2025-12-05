## Description
A small project with a Vue.js 3 + TypeScript client connected to a simple Symfony JSON API. The app calculates 
auctioned car fees.

## Requirements

- **Docker**: to run the development environment and backend services.
- **Node.js**: to run the Vue.js 3

# Installation

**Clone the repository and go to the project root:**  
```bash
git clone git@github.com:bendamqui/symfony-vue-fees-calculator.git
cd symfony-vue-fees-calculator
```

**Build and start the backend container:**  
```bash
docker-compose build
docker-compose run api composer install
docker-compose up
```

**Set up the frontend:**  
```bash
cd client
nvm use
npm install
npm run dev
```