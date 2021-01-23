# JuniorDeveloperJobs

![Tests](https://github.com/daniel-norris/juniordevelopers/workflows/Tests/badge.svg)

A work in progress. A job board for Junior Developer jobs.

## Project Links

**JIRA:** [juniordevelopers.atlassian.net](https://juniordevelopers.atlassian.net/)  

**CONFLUENCE:** [juniordevelopers.atlassian.net/wiki/spaces](https://juniordevelopers.atlassian.net/wiki/spaces/HOME/overview)  

## Installation

The project is using Laravel's Sail package to setup Docker containers to run the local environment. It is supported on MacOS, Windows (WSL2) and Linux. You will need *Docker Desktop* installed for most implementations. For further information, you should take a look (here)[https://laravel.com/docs/8.x/installation] at the Laravel installation docs or the Docker docs too. 

Git pull the project using: 

```
git clone git@github.com:daniel-norris/juniordevelopers.git <dir>
```

Alias the Sail command in your CLI: 

```
alias sail='bash vendor/bin/sail'
```

Spin up the Docker containers:

```
sail up
```

Generate a key for your app: 

```
sail php artisan key:generate
```

### Hosts

There is currently no QA environment setup for JuniorDeveloperJobs yet but there are plans for it to be included in the future. It may be worthwhile setting up your hosts file now for your local environment. 

In Windows 10 you can find this at: 

```
C:\Windows\System32\Drivers\etc\hosts
```

Add the following entry: 

```
<youipaddress> local.juniordeveloperjobs
```

You can now view the project locally at: 

```
http://local.juniordeveloperjobs
```

## Workflow 

### Git

The project has an automated workflow that integrates GitHub activity with JIRA. You need to correctly label your Git commits and branches for this integration to correctly work.

e.g.  

**BRANCH:** jd-9-setup-project-dependencies  


**COMMIT:** JD-9: automated GitHub Actions workflow  

### Code Standards

The project has a number of tools to maintain code integrity. A pipeline using GitHub Actions is setup to run these tests automatically when a pull request is made. You can also run then locally on your machine before pushing to GitHub.

*PHP Code Sniffer*, maintains adherence to PSR12 standards. 

You can run PHPCS prior to creating a pull request using: 

```
sail composer cs-check
```

It's possible to automatically correct most CS errors using: 

```
sail composer cs-fix
```

*Psalm* is a static analysis tool that maintains adherence to strict typing. You can run this locally using: 

```
sail composer psalm
```

Unit tests are run using *PHP Unit*. 

```
sail composer test
```


