<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Link</title>
</head>
<body style="margin:0; padding:0; background-color:#f3f4f6; font-family:'Segoe UI', Arial, sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f3f4f6; padding:40px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="480" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.08);">

                    <!-- Header -->
                    <tr>
                        <td style="background:linear-gradient(135deg,#4f46e5,#7c3aed); padding:32px; text-align:center;">
                            <div style="width:56px; height:56px; background-color:rgba(255,255,255,0.2); border-radius:14px; display:inline-block; line-height:56px; margin-bottom:12px;">
                                <span style="font-size:26px;">🔑</span>
                            </div>
                            <h1 style="color:#ffffff; font-size:22px; margin:0; font-weight:700;">
                                Log in without a password
                            </h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:36px 32px;">
                            <p style="color:#374151; font-size:16px; line-height:1.6; margin:0 0 8px;">
                                Hi there,
                            </p>
                            <p style="color:#374151; font-size:16px; line-height:1.6; margin:0 0 28px;">
                                You requested a secure link to log in to your account. Click the button below to sign in instantly &mdash; no password needed.
                            </p>

                            <!-- Button -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="padding-bottom:28px;">
                                        <a href="{{ url($url) }}"
                                           style="background-color:#4f46e5; color:#ffffff; text-decoration:none; font-weight:600; font-size:16px; padding:14px 36px; border-radius:10px; display:inline-block;">
                                            Click here to log in
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="color:#9ca3af; font-size:13px; line-height:1.6; margin:0; text-align:center;">
                                This link will expire soon for your security.<br>
                                If you didn't request this, you can safely ignore this email.
                            </p>
                        </td>
                    </tr>

                    <!-- Divider -->
                    <tr>
                        <td style="padding:0 32px;">
                            <div style="border-top:1px solid #e5e7eb;"></div>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:24px 32px; text-align:center;">
                            <p style="color:#9ca3af; font-size:12px; margin:0;">
                                Having trouble with the button? Copy and paste this link into your browser:
                            </p>
                            <p style="color:#6366f1; font-size:12px; margin:6px 0 0; word-break:break-all;">
                                {{ url($url) }}
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>