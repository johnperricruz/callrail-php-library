##Callrail PHP Library

Here's some code! :+1:

<b>Initialize Library: </b>

```php
require_once('path_to_your_callrail.php');
$callrail = new Callrail();
$callrail->setApiKey('YOUR-CALLRAIL-API-KEY');
```

<b>Callrail Objects: </b>

```php
//Call query
$callrail->getCalls("?start_date=".$from."&end_date=".$to."&company_id=".$client."&page=".$page."");

//Detailed Call
$callrail->getDetailedCalls($call_id);

//Company
$callrail->getCompanies();
```
<br/><br/>
<b>John Perri Cruz</b><br/>
https://www.johnperricruz.com

