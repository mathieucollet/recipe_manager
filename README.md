[![Quality gate](https://sonarcloud.io/api/project_badges/quality_gate?project=mathieucollet_recipe_manager)](https://sonarcloud.io/dashboard?id=mathieucollet_recipe_manager)


[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=mathieucollet_recipe_manager&metric=bugs)](https://sonarcloud.io/dashboard?id=mathieucollet_recipe_manager)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=mathieucollet_recipe_manager&metric=code_smells)](https://sonarcloud.io/dashboard?id=mathieucollet_recipe_manager)
[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=mathieucollet_recipe_manager&metric=duplicated_lines_density)](https://sonarcloud.io/dashboard?id=mathieucollet_recipe_manager)
[![Lines of Code](https://sonarcloud.io/api/project_badges/measure?project=mathieucollet_recipe_manager&metric=ncloc)](https://sonarcloud.io/dashboard?id=mathieucollet_recipe_manager)


[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=mathieucollet_recipe_manager&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=mathieucollet_recipe_manager)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=mathieucollet_recipe_manager&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=mathieucollet_recipe_manager)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=mathieucollet_recipe_manager&metric=security_rating)](https://sonarcloud.io/dashboard?id=mathieucollet_recipe_manager)
[![Technical Debt](https://sonarcloud.io/api/project_badges/measure?project=mathieucollet_recipe_manager&metric=sqale_index)](https://sonarcloud.io/dashboard?id=mathieucollet_recipe_manager)

# Recipe Manager

School project aiming to set up a recipe manager, with a database.

The main point of the project is to use an ORM to execute SQL queries.

## Team
Project carried out by Cédric B, Mathieu C and Jérémy L.

## Usage
You can create a user and use the platform as you wish.

The project database is pre-filled, via Laravel's seed system, with two recipes and their ingredients, tags and users.

Two users exist by default:
- Login : user@user.user - Password : useruser
- Login : admin@admin.admin - Password : adminadmin

## Stack
- Laravel 7 PHP Framework
- Eloquent Laravel's ORM
- MySQL DB
- Bootstrap 4 CSS Framework
- JQuery JS Framework
- Material Icons Library
- Summernote WYSIWYG
- Project deployed on Heroku

## Achievements
- View shared recipes without being logged in
- Create a user account
- Manage an ingredient list (Create, Read, Update, Delete) specific to the logged in user, usable when creating a recipe.
- Manage a user-specific list of recipes (Create, Read, Update, Delete).
- As administrator, manage a list of tags (Create, Read, Update, Delete), usable when creating a recipe.
- Choose whether or not to share a recipe on the platform.
- Possibility of liking recipes (even his own), and finding them in a dedicated page.
- Recipe search system based on name, description and tags.
