
# Slutprojekt Noah Fredholm Design Doc

## Overview

Detta slutprojekt är en hemsida som möjliggör att användare kan logga in och submitta runs från spelet [Balatro](https://store.steampowered.com/app/2379780/Balatro/), ett poker-inspirerat roguelite-spel.


### Ladda upp och visa runs 
Användare kan submitta sina runs och även se en lista över andras runs.

### Filtrering 
Användare kan filtrera runs baserat på olika kriterier, t.ex. poäng, tid eller andra parametrar.

### Reaktioner och kommentarer 
Användare kan interagera med andras runs genom att lämna reaktioner och kommentarer.

### Profilstatistik 
Varje användare får en profil med statistik som
  - Totalt antal klara runs
  - Högsta poäng
  - Genomsnittliga run-tider

### Leaderboards

- Hemsidan kommer att innehålla flera leaderboards för att lyfta fram toppresterande spelare, t.ex. för högsta poäng eller snabbaste runs.

### Admin

- Administratörer får särskilda rättigheter och kan:
  - Ta bort användare
  - Radera runs
  - Hantera kommentarer och reaktioner

Hemsidan ska fungera som en central hubb för Balatro-spelare som vill dela sina framgångar, jämföra prestationer och tävla mot andra i communityn.


## Teknologier

Hemsidan kommer använda sig av de teknologier som behövs i slutprojektet

### PHP

PHP för att ansluta sig till databasen och hantera cookies, admin-relaterat, session management osv.

### SQL (MySQL)

För databasen som ska lagra all data. Mer om detta senare i dokumentet.

### HTML, Sass, Javascript

Dessa ska användas för att bygga hemsidan. BEM ska även användas för namnstandard i css.

Javascript ska användas för att snacka med PHP delen, så sidan kan bli dynamisk istället för statiskt (Som den hade blivit med endast PHP).

Javascript kan också hjälpa med att göra sidan responsiv.

## Databasens struktur

```sql
create table USERS (
  UserID INT PRIMARY KEY, 
  Username VARCHAR(50),
  Password VARCHAR(50),
  CreatedAt DATE,
  IsAdmin BOOLEAN,
);
```
```sql
create table RUNS (
  RunID INT PRIMARY KEY, 
  UserID INT FOREIGN KEY,
  Score FLOAT,
  SubmittedAt DATE,
  -- Här kommer fler grejer finnas såsom antal händer spelade osv
);
```
```sql
create table STATS (
  StatID INT PRIMARY KEY, 
  UserID INT FOREIGN KEY,
  HighestScore FLOAT,
  RunsCompleted INT,
  -- Här kan fler stats finnas
);
```
```sql
create table COMMENTS (
  CommentID INT PRIMARY KEY,
  UserID INT FOREIGN KEY,
  RunID INT FOREIGN KEY, 
  CreatedAt DATE,
  Content TEXT
);
```

## Balatro mod

Inte direkt slutprojekts-relaterat:

Ett mod till Balatro kan göras som lägger till en "Share" knapp vid game over skärmen. Se nuvarande game over skärm nedan:

![Game over skärm](https://static.wikia.nocookie.net/game-over-dex/images/5/5e/Balatro-windows-game-over-results-of-a-run.jpg/revision/latest/scale-to-width-down/1200?cb=20240729171759)

Denna "Share" knapp hade kunnat öppna webbläsaren till sidan där man submittar sin run med alla värden ifyllda.
