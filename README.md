# Sample Project

## Setup

More to come.

## Deployments

Deployments of code is managed via actions in Github.

* master -> This branch points to a staging environment
* release -> This branch points to a production environment.

Getting work to release

1. Do work on a topic branch
2. merge into master to stage changes
3. Once work has been completed and tested, merge topic branch into release to deploy.

```
git checkout release            # update local environment
git pull origin release         # update local environment
git checkout -b {topic-branch}  # create topic branch
git add .                       # do work
commit -m "do work"             # do work         
```

Now stage your work on master (which is pointed to staging)
```
git checkout master             # update local environment
git pull origin master          # update local environment  
git merge {topic-branch}        # merge your topic branch into master
...resolve any merge conflicts if present...
git push origin master          # stage your work
```

Once your work is approved, let's launch it live
```
git checkout release            # update local environment
git pull origin release         # update local environment
git merge {topic-branch}        # merge your topic branch
...resolve any merge conflicts if present...
git push origin release         # deploy to wp engine
```

## 
## Frontend Laravel (v11)
Install project packages from terminal command line
`npm install`

Initiate Database and seed data:
`php artisan migrate --seed`