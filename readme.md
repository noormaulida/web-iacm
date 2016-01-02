Web Ikatan Alumni Cahaya Madani Banten Boarding School
======================================================

-----------------------------------------------------------------------------------------

## Technical Requirement

* PHP >= 5.4
* MySQL >= 5.1

-----------------------------------------------------------------------------------------

## Installation Guide

1. Create empty directory.
1. Run **`git init`** inside your empty directory.
1. Add remote git url (**`git remote add origin git@github.com:noormaulida/web-iacm.git`**). You can use **`origin`** for remote name, or something that you like (example: **`something`**).
1. Run **`git pull origin master`** or **`git pull something master`** (if you use another remote name).
1. Create dan configure **`application/config/database.php`** file based on **`application/config/database.php.default`**.
1. Set manually **`$config['migration_version'] = [number]`** in file **`application/config/migration.php`**. Number used is the last prefix number of all files in **`application/migrations`**.
1. Run **`php index.php migrate`** in the root project to migrate database.
1. Do step 6 and 7 manually if you're added new migration (Note: file migration name must be sequentially prefixed as setting **`$config['migration_type']`** in **`application/config/migration.php`** file).
1. If you want to rollback the **`017_name_file`** migration (will used **`down`** method), use **`$config['migration_version'] = 16`** (It means you should use the smaller number than your-prefix-migration-name-you-want-to-rollback).
1. Create username and password for admin with command **`php index.php console new-admin [your email] [your password]`** in the root project.
1. Try login in with url **`/pages/login`**.
1. Done!

-----------------------------------------------------------------------------------------

## Important Things!
1. **Don't push to branch `master` directly**, create your local branch (example: `momo`) or based on issue number you're working (example: `issue-09`).
1. If you're ready to merge with master, create pull request for your branch and I'll give review for your excellent work (don't merge by yourself).
1. Keep your local master branch update with remote master branch to avoid conflict.
1. Please append `#issue-number` in your message when commiting something (example: **`git commit -m #4 Add new model`**)

-----------------------------------------------------------------------------------------

## Main Component

* Codeigniter 3.0.3
* MySql Database

-----------------------------------------------------------------------------------------

## Please contact me if there's problem when setting up this application.