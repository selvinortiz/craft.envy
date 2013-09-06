## Envy 0.8.1
Distributed environment configuration for [Craft](http://buildwithcraft.com) *by* [Selvin Ortiz](http://twitter.com/selvinortiz)

## Description
**Envy** gives you the tools necessary to adapt [multiple environment config](http://docs.buildwithcraft.com/diving-in/multi-environment-configs.html) to work beautifully in a *distributed environment*.

---

## What are distributed environments?
*Distributed environments* are those in which two or more people (boys/girls/other) from different disciplines (designers/developers/other) may be working on a single (craft) project on different platforms (Win/Mac/Linux/Other).

## Who should use envy?
If you do not need to make your craft install *distributed environment friendly* then you do not need **envy**, craft will be more than enough.

## How does it work?
**Envy** works by allowing you to define *local development environment* `credentials/configs` outside of `craft/config/(db|general).php` then injecting them into the config array at runtime.

Doing this will allow you to `.gitignore` this file and when someone else `clones` your `repo`, they can add their own `credentials/configs` without making any changes to push upstream.

## How do I set it up?
Before getting started with **envy**, please make sure you understand how [multiple environment config](http://docs.buildwithcraft.com/diving-in/multi-environment-configs.html) by [craft](http://buildwithcraft.com) works and what problem it helps you solve so that you can asses whether or not you need **envy**.

---

### Installation
1. Create a directory called `env` at the same level as the `craft` and `public` directories.

2. Place the contents of this repo inside your `env` directory.

3. Copy the code from `env/sample.index.php` into `public/index.php`

4. Copy the code from `env/sample.db.php` into `craft/config/db.php`

5. Copy the code from `env/sample.general.php` into `craft/config/general.php`

6. Create a copy of `env/sample.myenv.php` and rename it to `env/myenv.php`

7. Update `env/myenv.php` with your local development environment`db` and `general` config.

8. Add a rule to your `.gitignore` file (if using git) to ignore `myenv.php`

9. When someone else clones your repo, they should perform step **6** and **7**

### Advanced Installation
1. Follow the installation above.

2. You can move your `env` directory elsewhere or rename it as long as you update the `$envPath` @ `public/index.php`

### Cloning & Downloading
You can safely download the [master branch](https://github.com/selvinortiz/craft-envy/archive/master.zip)
or if you prefer, you can checkout the [official releases](https://github.com/selvinortiz/craft-envy/tags)

---

## Documentation
This is what you need to know to get your local development environment configured for **envy**

### `@env/myenv.php`
This is where you will set your *local development environment* `credentials/configs`

#### `$myEnvKey`
This is the domain name you are using to develop locally and can also be a partial string based on the way Craft does the match.
In other words, you can use `domain.dev` or `.dev` and Craft should match it properly in most cases.

#### `$myDbConfig`
This is a one dimensional array of your `database` configuration.

#### `$myGeneralConfig`
This is a one dimensional array of your `general` configuration.

### `@public/index.php`
We simply import `env/env.php` to load **envy**

### `@env/env.php`
We define all the logic to safely load your `env/myenv.php` and inject it into the global config array at runtime.

### `@craft/config/db.php`
We simply wrap the global `db` config array within the `injectMyDbCofig()` utility function defined @ `env/env.php`

### `@craft/config/general.php`
We simply wrap the global `general` config array within the `injectMyGeneralCofig()` utility function defined @ `env/env.php`

---

## Final Thoughts
1. If you are not using `git|mercurial` start right now!

2. It might be easier to start using **envy** by downloading rather than cloning into your *craft install* as that can lead to submodule issues.

3. If you get stuck just ping track me down online, I'll be happy to help.

4. If you have any questions or comments you can find me on **twitter** [@selvinortiz](http://twitter.com/selvinortiz)
