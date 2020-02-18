# iTop extension: molkobain-newsroom-provider
* [Description](#description)
* [Compatibility](#compatibility)
* [Configuration](#configuration)

## Support
If you like this project, you can buy me beer, always appreciated! 🍻😁

[![Donate](https://img.shields.io/static/v1?label=Donate&message=Molkobain%20I/O&color=green&style=flat&logo=paypal)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BZR88J33D4RG6&source=url)

## Description
Never miss a new extension or updates by being notified directly in the newsroom of your iTop!

_**Disclaimer:** In order to only show unread notifications, the remote server needs to identify you. To do so, this extension retrieves your User ID and your iTop UUID **BUT** transforms them into a non-reversible hash **before** sending it to the remote server in order to preserve your privacy._

_Application name and version are also retrieved for statistics. They are only used to known which versions of iTop my extensions should be compatible with. 👨‍🔧_

## Compatibility
Compatible with iTop 2.4.1+

## Dependencies
* Module `molkobain-handy-framework/1.2.4`

*Note: Dependencies are not included in this extension as it is supposed to be packaged with "real" extensions.*

## Configuration
No configuration needed.

### Parameters
The extension has only 1 configuration parameter:
  * `enabled`: Enable or disable extension. Possible values are `true`|`false`, default is `true`.


## Licensing
This extension is under [AGPLv3](https://en.wikipedia.org/wiki/GNU_Affero_General_Public_License).
