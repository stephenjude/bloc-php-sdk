# An SDK to easily work with the BlocHQ API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stephenjude/blochq-php-sdk.svg?style=flat-square)](https://packagist.org/packages/stephenjude/blochq-php-sdk)
![Tests](https://github.com/stephenjude/blochq-php-sdk/workflows/run-tests/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/stephenjude/blochq-php-sdk.svg?style=flat-square)](https://packagist.org/packages/stephenjude/blochq-php-sdk)

This SDK lets you perform API calls to [BlocHQ APIs](https://docs.blochq.io/reference).

## Documentation

### Installation

To install the SDK in your project you need to require the package via composer:

```bash
composer require stephenjude/blochq-php-sdk
```

### Basic Usage

You can create an instance of the SDK like so:

```php
$blocHQ = new \Stephenjude\BlocHqPhpSdk\BlocHQ(TOKEN_HERE);
```

#### Manage Account

```php
$blocHQ->createCollectionAccount();
```

#### Mange Transfers

```php
$blocHQ->transferFromOrgBalance(AMOUNT,ACCOUNT_NUMBER, BANK_CODE,NARRATION,[META_DATA]);
```

#### Manage Transactions

```php
$blocHQ->getAllTransactions();
$blocHQ->getTransactionById(TRANSACTION_ID);
$blocHQ->getTransactionByReference(TRANSACTION_REFERENCE);
```

#### Manage Banks

```php
$blocHQ->getBankList();
$blocHQ->resolveBankAccount(ACCOUNT_NUMBER, BANK_CODE);
```

### API Reference

All API references can be found on [BlocHQ](https://docs.blochq.io/reference) documentation website.

## Security

If you discover any security related issues, please email jude@pay4me.app instead of using the issue tracker.

## Credits

- [Stephen Jude](https://github.com/stephenjude)
- [All Contributors](../../contributors)

This package uses code from and is greatly inspired by
the [Ohdear SDK package](https://github.com/ohdearapp/ohdear-php-sdk) by [Freek](https://github.com/freekmurze)
& [Mattias Geniar](https://github.com/mattiasgeniar).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
