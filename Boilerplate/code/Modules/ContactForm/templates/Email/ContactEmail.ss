<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><%t ContactEmail.Subject 'New email from:'%> $Name</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body style="font-family: sans-serif">
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="2" style="padding: 0 0 10px 0;"><% if $Logo %><a href="{$BaseHref}">{$Logo}</a><% end_if %></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;"><strong><%t ContactEmail.Subject 'From:'%></strong></td>
                <td style="padding: 10px 0;"><a href="mailto:$Email">$Name</a></td>
            </tr>
            <tr>
                <td style="padding: 10px 0;"><strong><%t ContactEmail.Email 'Email address:'%></strong></td>
                <td style="padding: 10px 0;"><a href="mailto:$Email">$Email</a></td>
            </tr>
            <tr>
                <td style="padding: 10px 0 0 0;"><strong><%t ContactEmail.Message 'Message:'%></strong></td>
                <td style="padding: 10px 0 0 0;">$Message</td>
            </tr>
        </table>
    </body>
</html>