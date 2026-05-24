# AgroAI - Intelligent Agricultural Solutions

AgroAI is a full-stack, AI-powered agricultural advisory platform designed to help farmers optimize their yields, prevent pest outbreaks, and manage irrigation efficiently. The application bridges modern AI technologies (OpenAI GPT-4) with sustainable farming practices, all styled in a premium "Cyberpunk-meets-Nature" design.

---

## ⚡ Portable Docker Architecture

We have packaged the entire AgroAI stack into a **highly portable, single-container Docker image**. This makes sharing the project with team members, clients, or deploying to production effortless.

### Key Benefits
- **Zero Local Setup**: Your machine doesn't need PHP, Node.js, Composer, Nginx, or any local packages installed. Everything is built internally inside the container.
- **Vite Pre-Compiled**: Frontend assets (Tailwind CSS, Alpine.js, and JS/CSS files) are compiled during the Docker build process.
- **Nginx + PHP-FPM Co-existence**: A lightweight process Supervisor handles both Nginx and PHP-FPM seamlessly inside the same container.
- **Remote DB Integration**: Directly uses the remote MongoDB Atlas connection specified in the `.env` file, removing the need to manage a local database.

---

## 🚀 Quick Start (Running the Application)

Follow these simple steps to run the application in less than 2 minutes:

### 1. Prerequisites
Ensure you have **Docker** and **Docker Compose** installed on your system.

### 2. Environment Configuration
Make sure you have a `.env` file in the root of the project with your configurations. If you don't have one, copy the example:
```bash
cp .env.example .env
```
Ensure your `.env` contains the correct `DB_URI` (MongoDB Atlas) and `OPENAI_API_KEY`.

### 3. Launch the Application
Run the following command in the root directory:
```bash
docker compose up -d --build
```
This command will:
1. Pull the small, efficient base images.
2. Compile and package the frontend assets using Node.
3. Install all Composer dependencies.
4. Set up Nginx and Supervisor.
5. Launch the application on port **8004**.

Once the build finishes, open your browser and navigate to:
👉 **[http://localhost:8004](http://localhost:8004)**

---

## 🛠️ Management Commands

Once the container is running, you can interact with it using standard Docker commands:

### Run Database Migrations
To set up indexes and MongoDB collections, execute migrations inside the container:
```bash
docker compose exec app php artisan migrate
```

### View Application Logs
To stream Laravel or server logs in real time:
```bash
docker compose logs -f
```

### Access Container Shell
If you need to run arbitrary artisan or shell commands inside the environment:
```bash
docker compose exec app bash
```

### Stop the Application
To stop the container:
```bash
docker compose down
```

---

*Developed by the AgroAI Engineering Team.*
