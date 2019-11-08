# Alert #

Shortcode: **alert**

## Purpose ##

bla bla

## Sample ##

![Color](../../images/alert.png)

## Usage ##

```
[alert type="info" class="more classes"]This is an alert[/alert]
```

## Structure and options ##

### Structure

| shortcode | optional | optional  | ] | content | /shortcode  |
| --- | --- | --- | --- | ---| ---|
| [alert  | [type="{type}"]  | class="{classes}" | ]  | {content} |  [/alert] |


### Options

#### type

Gives the alert a style according to the bootstrap color standard schemes

###### specification
|||
| --- | --- |
| type | string |
| required | no |
| default | "info" |


###### values 
* primary
* success
* danger
* warning
* info

### class

Additional classes added to the alert

###### specification

|||
| --- | --- |
| type | string delimited by ' ' (blank) |
| required | no |
| default | blank ('') |


###### values
`class="more than one class"`


| class | string | No | additional css classes delimited by ' ' |  | blank  | `[alert class="one two three"]Sample with class[/alert]` |


