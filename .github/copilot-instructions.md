# Copilot Instructions: Heroes and Monsters 3

## Project Overview
This is a PHP OOP exercise project (from Vivify Ideas) demonstrating design patterns through a heroes vs monsters combat simulation. **Primary goal**: Showcase OOP principles and design patterns, not necessarily a fully functional game. See [Zadatak.txt](../Zadatak.txt) for complete requirements (in Serbian).

**Important**: While requirements are in Serbian, implement all code in English (class names, methods, variables). Only logging messages should use Serbian as specified in requirements.

## Architecture & Structure

### Namespace Convention
- Follows PSR-4 autoloading: `App\` maps to `app/`
- Example: Classes in `app/Logs/` use namespace `App\Logs`
- Example: Classes in `app/Classes/` use namespace `App\Classes`
- See [Logger.php](../app/Logs/Logger.php) for reference implementation

### Directory Layout
```
app/
  Classes/      - Game entities (heroes, monsters) - currently empty, to be populated
  Exceptions/   - Custom exception classes - currently empty
  Interfaces/   - Contracts for game components - currently empty
  Logs/         - Logging infrastructure (Logger.php)
```

## Design Patterns in Use

### Singleton Pattern (Logger)
- [Logger.php](../app/Logs/Logger.php) implements classic Singleton:
  - Private static `$instance` property
  - Private constructor prevents direct instantiation
  - Static `getInstance()` method for access
- Usage: 
  ```php
  use App\Logs\Logger;
  Logger::getInstance()->log("message");
  ```
- Logger outputs directly to HTML with `<br>` tags (echo-based, not file-based)

## Development Practices

### Autoloading
- Composer autoloader configured (`vendor/autoload.php`)
- Include at top of entry files: `require_once __DIR__ . '/vendor/autoload.php';`
- Run `composer dump-autoload` after adding new classes

### Code Style Notes
- Inline comments use numbered steps for pattern explanations (see Logger constructor comments)
- Type hints used: `String $text`, `void` return types
- No explicit exception handling visible yet (exceptions directory empty)

## Critical Gaps (For AI Awareness)
- Class directories are empty - classes need to be created following the namespace pattern in Logger
- No test files present

## Game Requirements (from Zadatak.txt)

### Heroes (app/Classes/)
1. **Wizard (Čarobnjak)**: 150 health
2. **Swordsman (Mačevalac)**: 100 health

### Weapons (app/Classes/)
- **Sword (Mač)**: Only swordsman can use (throw exception for wizard)
- **Spear (Koplje)**: Only swordsman can use (throw exception for wizard)
- **Spell (Čarolija)**: Only wizard can learn/use

### Weapon Management
- Heroes carry weapons in a backpack (max 2 weapons)
- One weapon active at a time, weapons switch by array index
- Throw `NoWeaponException` if trying to switch when backpack empty
- Throw exception if trying to add 3rd weapon to backpack
- When hero drops weapon, another hero can pick it up; first hero takes next weapon from backpack

### Monsters (app/Classes/)
1. **Dragon (Zmaj)**: 
   - Hit attack: 5 damage
   - Fire breath: 20 damage
   - Random attack selection

2. **Spider (Pauk)**:
   - Hit attack: 5 damage
   - Bite attack: 8 damage
   - Random attack selection

### Combat Damage (Hero attacks)
- Wizard + Spell: 20 damage to monster
- Swordsman + Sword: 10 damage to monster
- Swordsman + Spear: 15 damage to monster

### Battle Simulation
- Random number (0-100): <50 hero attacks, >50 monster attacks
- Battle continues until one reaches 0 health
- Winner declared when opponent dies

### Logging Requirements (Logger singleton)
Logger must output with these formats **in Serbian**:
- Attack: `[attacker] je napao [victim] pomoću [weapon]`
- Weapon pickup: `[hero] je pokupio oružje [weapon]`
- Victory: `[hero/monster] je pobedio u duelu sa [hero/monster]`

**Note**: Use English entity names in logs (e.g., "Wizard je napao Dragon pomoću Spell")

## Required OOP Patterns
1. **Inheritance**: Hero base class → Wizard/Swordsman subclasses
2. **Singleton**: Logger (already implemented in [app/Logs/Logger.php](../app/Logs/Logger.php))
3. **Polymorphism**: Monster attack methods, weapon damage calculation
4. **Exception Handling**: 
   - Weapon restrictions (wizard cannot use sword/spear)
   - Empty backpack
   - Backpack capacity exceeded
5. **Optional**: Factory pattern (weapon/monster creation), Decorator (weapon enhancements)

## When Adding New Classes
1. Place in appropriate `app/` subdirectory (Classes/Exceptions/Interfaces/Logs)
2. Use namespace format: `namespace App\{subdirectory};`
3. Follow the Singleton pattern where appropriate (e.g., game state manager)
4. Use Logger for output:
   ```php
   use App\Logs\Logger;
   Logger::getInstance()->log("status message");
   ```
5. Remember to run `composer dump-autoload` after creating new files

## Suggested Class Structure
```
app/Classes/
  Hero.php (abstract base)
  Wizard.php (extends Hero)
  Swordsman.php (extends Hero)
  Weapon.php (abstract base or interface)
  Sword.php, Spear.php, Spell.php (weapons)
  Monster.php (abstract base)
  Dragon.php, Spider.php (extends Monster)
  Battle.php (combat simulator)
  
app/Exceptions/
  NoWeaponException.php
  InvalidWeaponException.php
  BackpackFullException.php
  
app/Interfaces/
  Attackable.php (for entities that can attack)
  Damageable.php (for entities that can take damage)
```
