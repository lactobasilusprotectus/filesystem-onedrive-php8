# Flysystem Adapter for OneDrive

#disclamire ini merupakaan package orang yang saya sesuaikan dengan php 8. kalo buat pr lama di acc jadi mendingan buat paket sendiri

## Installation

```bash
composer require lactobasilus/filesystem-onedrive-php8
```

## Usage
- Follow [Azure Docs](https://docs.microsoft.com/en-us/azure/active-directory/develop/quickstart-register-app) to obtain your `ClientId, ClientSecret & TenantId`
- Follow [OneDrive Docs](https://docs.microsoft.com/en-us/onedrive/developer/rest-api/getting-started/msa-oauth?view=odsp-graph-online) to obtain your `refreshToken`
```php
$token=new \As247\CloudStorages\Support\OneDriveOauth();
$token->setClientId('[Client ID]');
$token->setTenantId('[Tenant ID]');
$token->setClientSecret('[Client secret]');
$token->setRefreshToken('[Refresh token]');

$graph = new \Microsoft\Graph\Graph();
$graph->setAccessToken($token->getAccessToken());

$adapter = new \As247\Flysystem\OneDrive\OneDriveAdapter($graph, '[root path]');

$filesystem = new \League\Flysystem\Filesystem($adapter);

```
