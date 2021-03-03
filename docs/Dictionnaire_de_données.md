# Dictionnaire de données

## Tâches (`task`)

| Champ       | Type        | Spécificités                                    | Description                                    |
| ----------- | ----------- | ----------------------------------------------- | ---------------------------------------------- |
| id          | INT         | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant de notre tâche                   |
| title       | VARCHAR(64) | NOT NULL                                        | Le titre de la tâche                           |
| completion  | TINYINT(3)  | NULL, DEFAULT 0                                 | Le pourcentage de réalisation de la tâche      |
| status      | TINYINT(1)  | NOT NULL, DEFAULT 1                             | Le status de la tâche (1 en cours, 2 archivée) |
| category_id | INT         | NOT NULL, UNSIGNED                              | L'id de la catégorie de la tâche               |

## Catégories (`category`)

| Champ  | Type        | Spécificités                                    | Description                   |
| ------ | ----------- | ----------------------------------------------- | ----------------------------- |
| id     | INT         | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | L'identifiant de la catégorie |
| name   | VARCHAR(64) | NOT NULL                                        | Le nom de la catégorie        |
| status | TINYINT(1)  | NOT NULL, DEFAULT 1                             | Le status de la catégorie     |
