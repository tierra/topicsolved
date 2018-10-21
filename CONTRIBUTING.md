# Contributing to Topic Solved

The primary release ZIP is not designed for local development. Consider forking
and cloning this repository with git in order to submit patches using git pull
requests. A convenient docker environment is provided that allows for testing
changes with a fresh installation of phpBB 3.1 and 3.2:

1. Download and install [Docker](https://www.docker.com/).
2. Also install [Docker Compose](https://docs.docker.com/compose/install/).
3. On OSX, install [dinghy](https://github.com/codekitchen/dinghy).
4. On Linux, install [dory](https://github.com/FreedomBen/dory).

Now spin up the compose environment:

```bash
docker-compose up
```

If everything was installed correctly, you can open phpBB now:

*    phpBB 3.1: http://phpbb31.topicsolved.docker/
*    phpBB 3.2: http://phpbb32.topicsolved.docker/

Simply run through the normal phpBB installation procedures, and you should
find the Topic Solved extension available in the ACP customizations. For the
database, use "db" for the host, "root" for user, leave password blank, and use
"phpbb" for database. You will need to use different table prefixes for each
version of phpBB since they use the same database, like "bb31_" and "bb32_".

You will want to edit the phpBB config files in order to enable debug mode,
which allows you to leave the "install" directory in place while viewing the
board:

```bash
docker-compose run --rm phpbb31 bash
vim config.php # Enable @define('DEBUG', true);
```

## Running Unit and Functional Tests

Running tests locally requires installing Composer dependencies first:

```
docker run --rm --interactive --tty --volume $PWD:/app \
  --user $(id -u):$(id -g) composer install
```

## Building Releases

Steps for creating a new release:

1. Bump the version in `composer.json`, and commit that change.
2. Verify all CI jobs pass, and fix any that don't with new commits.
3. Tag the final commit that passes CI: `git tag 2.3.0`.
4. Push the tag to GitHub: `git push --tags`.
5. Create the release archive ZIP:

```
git archive --prefix tierra/topicsolved/ \
  --format zip 2.3.0 > topicsolved-2.3.0.zip
```

6. Create the GitHub release based on the tag, with list of changes, and upload
   the release archive ZIP to that new release:
   https://github.com/tierra/topicsolved/releases/new
7. Bump the release specified in the update check source here:
   https://github.com/tierra/topicsolved/blob/gh-pages/versions.json
8. Upload the release archive ZIP as a new revision on phpBB extension DB:
   https://www.phpbb.com/customise/db/extension/topic_solved/revision
