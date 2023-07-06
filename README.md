# insta2twislack 🐢

insta2twislack is a PHP library for sharing instagram posts to twitter and slack automatically.

## Installation



```bash
# 1. download files
git clone --recursive https://github.com/tmatsumor/insta2twislack.git

# 2. change directory
cd insta2twislack

# 3. replace tokens and userpwd, channel name
# $INSTA_TOKEN, $TWI_USERPWD, $SLACK_TOKEN, $SLACK_CHANNEL
vi insta2twislack.php

# 4. replace twitter token
vi twitter_api_php/twitter_token.json

# 5. call php to create insta_post_ids.txt
php insta2twislack.php

# done!

```
## Required Parameters
DO NOT PLACE THESE PARAMETERS IN YOUR PUBLIC FOLDER.
```php
$INSTA_TOKEN			instagram long lived access token
$TWI_USERPWD			twitter OAuth 2.0 client id and secret
$SLACK_TOKEN			slack api user OAuth token
$SLACK_CHANNEL			destination channel name in slack
twitter_token.json		twitter OAuth 2.0 access token
```
## Usage
Use it with cron, e.g., every three minutes.
```bash
php insta2twislack.php
```

## Example
After installation, just type the two lines below.
```bash
# 1. remove the latest instagram post id from the file below
sed -ri 's/^[^,]+,//' insta_api_php/insta_post_ids.txt  # for demo

# 2. call insta2twislack
php insta2twislack.php

# 3. result
# you will see a new post in your twitter and slack
```

## Dependency
Sub modules
- [tmatsumor / insta_api_php](https://github.com/tmatsumor/insta_api_php)
- [tmatsumor / twitter_api_php](https://github.com/tmatsumor/twitter_api_php)
- [tmatsumor / slack_api_php](https://github.com/tmatsumor/slack_api_php)

## Contributing

Pull requests are welcome.

For major changes, please open an issue first
to discuss what you would like to change.


## License

[MIT](https://choosealicense.com/licenses/mit/)
