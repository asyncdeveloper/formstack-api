# PHP API for Users
> A REST API which allows you create, read and update users 

## Description
This project was built with PHP and MySQL.

## Prerequisites

- Virtualbox >= 5.1
- Vagrant >= 1.9.5
- Git
- Root access to your local machine

### Getting your Environment Setup
Create an `.env` file using the command.
 
```console
$ cp .env.example .env
```

This is the config for the provisioned image 

| Type           | Value                  |
|----------------|------------------------|
| MySQL Username | my_app                 |
| Mysql Password | secret                 |
| Mysql Database | my_app                 |
| SSH Username   | vagrant                |
| SSH Password   | vagrant                |

 - Make sure your SSH is configured to work with Github -
    [https://help.github.com/articles/generating-an-ssh-key/](https://help.github.com/articles/generating-an-ssh-key/)
    
- Update your `/etc/hosts` file
    ```
    echo 192.168.59.76   testbox.test www.testbox.test | sudo tee -a /etc/hosts
    ```
 
- Next you can simply use the `vagrant up` command to start provisioning your local environment!

## Running the API
Install the dependencies run migrations and seed using setup script

```console
$ cat setup.sh | vagrant ssh
```

[Run Application in browser](http://www.testbox.test)

# API documentation:
API End points and documentation can be found at:
[Postman Documentation](https://documenter.getpostman.com/view/5928045/SzzdE1sv).

List of all API endpoints:

>GET /api/users

>POST /api/users

>GET /api/users/{id}

>PATCH /api/users/{id}

>DELETE /api/users/{id}
