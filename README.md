# openvbx-saveandreply
openvbx-saveandreply is a plugin for OpenVBX (http://openvbx.org) that allows you to save an incoming SMS to an inbox and automatically respond.

## Requirements

Tested for use with OpenVBX 1.2.15 r79
It should also work with version 1.2.13 and above.
If you find any issues please open a [support request] [1].

[1]: https://github.com/matthewgall/openvbx-saveandreply/issues

## Installation

[Download][2] the plugin and extract to /plugins

[2]: https://github.com/matthewgall/openvbx-saveandreply/issues/archive/master.zip

## Usage

Once installed, New applets will appear on the sidebar when you create flows. You will also see a new page appear on the sidebar.

#### Applets

##### Dial Record

This works exactly the same way as the standard Dial applet with a few additional features:

* You have the option of telling the caller something before the dial happens. This is useful for "call may be recorded" messages.
* You can record the dial as it is ringing or when it is answered. It is recommended that you wait until the call is answered.