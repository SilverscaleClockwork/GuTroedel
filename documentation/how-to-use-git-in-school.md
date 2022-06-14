# How to use git in school.

## Initial work.
- Create Ssh key
```sh
ssh-keygen
```

- Copy public key to github.

## In school or Windows
- set ssh method
```sh
git config --global http.sslBackend schannel
```
- Set user agent
```sh
eval $(ssh-agent)
```

- Add key
```sh
ssh-add ~/.ssh/id_rsa.pub
```

## Clone repository
You can clone a repository with this command.
```sh
git clone <url>
```

## Make a branch
A branch is used to keep the main branch save.
You have to create a branch to work with multiple people.
```sh
git branch <branch name>
```

## Move to a branch
To move into a branch to edit or view other peoples (and your own) progress.
```sh
git checkout <branch name>
```

## Save the progress
```sh
git add .
git commit
git push
```
