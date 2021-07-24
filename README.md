# Password Manager - API
## Infos
* Code: https://github.com/Lukas220300/pm-api/
* Docs: https://password-manager-api.lndo.site/api/docs

## Development
### Setup
1. Run with Lando (https://lando.dev) `lando start`
2. Load Fixtures `lando console doctrien:fixtures:load`
3. Create local KeyPair for JWT `lando console lexik:jwt:generate-keypair`

### Test
* Run `lando phptest`


## https://github.com/Lukas220300 @lukas220300
![alt LOGO @Lukas220300](https://avatars.githubusercontent.com/u/27235229?v=4)


# Keys
- Entity: User
    - `pbkdf2Salt` -> Salt for PBKDF2 to generate key out of user password
- Entity: AsymmetricKeyPair
    - `privateKey` -> with key from PBKDF2 encrypted privateKey
    - `publicKey` -> non encrypted publicKey