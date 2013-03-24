Utility2
=================

A kick-ass starter theme for any Lemonstand store!

## FAQ

### Q. Why do my icons show up as empty boxes?

If you installed LemonStand a while ago, you may need to update the .htaccess to add this to the end of the pipe delimited list of file extensions `|eot|woff|ttf|svg`, like this:

```
RewriteCond %{REQUEST_URI} !(\.(ico|js|jpg|gif|css|png|swf|txt|xml|xls|eot|woff|ttf|svg)$)
```
