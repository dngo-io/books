<p align="center">
<img src="https://steemitimages.com/DQmb9Y6u1JEWetJi3TMsk35UjXgWvgWAom4p9qGCF9Bex5p/dngo-hq-logo.png" />
</p>

# DNGO Books Project

Use this to kick-start a Doctrine based Laravel app.

Included are the following:

 * Barryvdh Debugbar
 * Barryvdh IdeHelper
 * Beberlei Assert
 * Doctrine
 * Doctrine Behaviours
 * Doctrine Domain Events
 * Doctrine Entity Audit
 * Doctrine Entity Validation
 * Eloquent Enumerations
 * Environment Loader
 * HTML Builder
 * Homestead

## Entities

The default namespace is "App".

The following entities and matching repositories are provided, together with YAML mapping
files, pre-configured:

 * Permission
 * Role
 * User

Each repository has an interface that is pre-mapped to the interface in the repository
config.

### Domain Events

The User and Organization entities support Domain Events:

 * User Events
   * UserCreated
   * UserLoggedIn
   * AddressAddedToEntity
   * AddressRemovedFromEntity
   * AuthenticationCredentialsChanged
   * GrantedOrganizationToUser
   * GrantedPermissionToUser
   * GrantedRoleToUser
   * RevokedOrganizationFromUser
   * RevokedPermissionFromUser
   * RevokedRoleFromUser
 * Organization Events
   * OrganizationCreated
   * AddressAddedToEntity
   * AddressRemovedFromEntity

## Getting Started

 * `composer create-project dngo-io/books dngo-project`
 * setup your database settings / configure the other options
 * `./artisan doctrine:schema:validate`
 * `./artisan doctrine:schema:create`
 * `./artisan db:seed`
 * `./artisan serve`
 * to use Vagrant, update the Homestead.yaml with the project location
 * `vagrant up`
 * then use the artisan commands as above

The standard Laravel welcome app + authentication have been setup and converted to Twig.

## Additional Helper Scripts

 * `cache_build.sh` - creates caches for routes, container etc.
 * `cache_clean.sh` - clears all caches including Doctrine query caches
 * `vagrant_db_reset.sh` - drops and rebuilds the database (for development only)
 * `vagrant_refresh.sh` - fully refreshes all applications files including composer update and npm install
