# Heroes and Monsters 3

A PHP OOP exercise project demonstrating design patterns through a heroes vs monsters combat simulation.

## Prerequisites

- Docker & Docker Compose installed
- VS Code with PHP Debug extension installed
- Port 8000 and 9003 available on your host

## Quick Start

### 1. Start the Application

```bash
docker compose up -d
```

This will:
- Build the Docker image with PHP 8.5, Composer, and Xdebug
- Start the container with volume mounts for live code editing
- Run the PHP built-in server on `http://localhost:8000`

### 2. Access the Application

Open your browser and navigate to:

```
http://localhost:8000
```

You should see the Heroes and Monsters 3 game output with battle simulations.



## Debugging with Xdebug



## Project Structure

```
.
├── app/                          # Application source code
│   ├── Classes/
│   │   ├── Characters/           # Heroes and Monsters
│   │   ├── GameObjects/          # Weapons
│   │   └── FightManager.php      # Battle logic
│   ├── Exceptions/               # Custom exceptions
│   ├── Interfaces/               # Contracts
│   └── Logs/
│       └── Logger.php            # Singleton logger
├── docker/
│   └── xdebug.ini               # Xdebug configuration
├── Dockerfile                    # PHP 8.5 container definition
├── docker-compose.yml            # Docker compose configuration
├── index.php                     # Entry point
└── readme.md                     # This file
```

## Configuration

### Xdebug Configuration

Located in `docker/xdebug.ini`:

```ini
[xdebug]
xdebug.mode=debug,develop
xdebug.start_with_request=yes
xdebug.client_host=host.docker.internal
xdebug.client_port=9003
xdebug.discover_client_host=0
```

### VS Code Debug Configuration

Located in `.vscode/launch.json`:

```json
{
  "name": "Listen for Xdebug (Docker)",
  "type": "php",
  "request": "launch",
  "port": 9003,
  "hostname": "0.0.0.0",
  "pathMappings": {
    "/var/www/html": "${workspaceFolder}"
  }
}
```

## Useful Commands

### Start container
```bash
docker compose up -d
```

### Stop container
```bash
docker compose down
```

### Rebuild container
```bash
docker compose up --build -d
```

### View container logs
```bash
docker compose logs -f
```

### Execute command in container
```bash
docker exec heroes_php <command>
```

### Open an interactive bash in container
```bash
docker-compose exec php bash
```

### Restart container
```bash
docker compose restart
```

## Notes

- The application uses **Singleton pattern** for the Logger
- Code follows **PSR-4 autoloading** via Composer
- All logging messages are output to HTML with `<br>` tags
- Xdebug logs are stored at `/tmp/xdebug.log` inside the container
- Volume mount allows live code editing—changes are immediately reflected (no rebuild needed)


