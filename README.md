# Wordpress on Cloud Foundry

interesting bits (readme forthcoming)

- uses CF volume service to mount `wp-content` from `/mnt` into each app container
- horizontally scalable from day one using `cf scale`
- `sync.sh` script using `cf ssh` automation to sync wp-content folder to the volume used in production

> Note: contains public demo credentials, do not use in production
