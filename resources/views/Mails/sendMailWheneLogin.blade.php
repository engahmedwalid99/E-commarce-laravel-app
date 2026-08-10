<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Successful - ShopZone</title>
</head>
<body style="margin:0; padding:0; background-color:#f2f4f8; font-family: 'Segoe UI', Arial, sans-serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f2f4f8; padding:40px 0;">
    <tr>
        <td align="center">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:520px; background-color:#ffffff; border-radius:16px; overflow:hidden; box-shadow:0 8px 30px rgba(0,0,0,0.08);">
                <tr>
                    <td style="background:linear-gradient(135deg, #6C3CE9 0%, #9B5CFF 100%); padding:36px 30px; text-align:center;">
                        <div style="font-size:26px; font-weight:800; color:#ffffff; letter-spacing:1px;">
                            🛍️ ShopZone
                        </div>
                        <div style="font-size:13px; color:#e8ddff; margin-top:4px;">
                            Your favorite online shopping destination
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center; padding-top:36px;">
                        <div style="width:72px; height:72px; background-color:#e7f8ef; border-radius:50%; display:inline-block; line-height:72px; font-size:34px;">
                            ✅
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding:20px 34px 10px; text-align:center;">
                        <h1 style="font-size:22px; color:#1f1147; margin:0 0 12px;">
                            Login Successful 🎉
                        </h1>
                        <p style="font-size:15px; color:#5a5470; line-height:1.8; margin:0;">
                            Hi <strong style="color:#6C3CE9;">{{ $user->name }}</strong> 👋<br>
                            @if ($user->role == 'user')
                                <p style="font-size:15px; color:#5a5470; line-height:1.8; margin:0;">Welcome to ShopZone!</p>
                            @elseif ($user->role == 'seller')
                                <p style="font-size:15px; color:#5a5470; line-height:1.8; margin:0;">Welcome to ShopZone! <br> As a seller, you can now
                                    list your products and manage your store.</p>
                            @else
                                <p style="font-size:15px; color:#5a5470; line-height:1.8; margin:0;">You are now an admin.</p>
                            @endif
                            <br>
                            You have successfully logged in to your <strong>ShopZone</strong> account.
                            Enjoy a seamless shopping experience with exclusive deals waiting for you!
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:24px 34px 0;">
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f8f6ff; border-radius:12px; padding:16px;">
                            <tr>
                                <td style="padding:8px 12px; font-size:13px; color:#8a84a3;">Login Time</td>
                                <td style="padding:8px 12px; font-size:13px; color:#1f1147; font-weight:600; text-align:right;">
                                    {{ now()->format('Y-m-d H:i') }}
                                </td>
                            </tr>
                            @isset($ipAddress)
                            <tr>
                                <td style="padding:8px 12px; font-size:13px; color:#8a84a3; border-top:1px solid #eee6ff;">IP Address</td>
                                <td style="padding:8px 12px; font-size:13px; color:#1f1147; font-weight:600; text-align:right; border-top:1px solid #eee6ff;">
                                    {{ $ipAddress }}
                                </td>
                            </tr>
                            @endisset
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:26px 34px 10px;">
                        <p style="font-size:12.5px; color:#a29cb5; line-height:1.7; text-align:center; margin:0;">
                            If this wasn't you, please change your password immediately and contact our support team.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="background-color:#faf9ff; padding:22px 30px; text-align:center; border-top:1px solid #f0ecff;">
                        <p style="font-size:12px; color:#a29cb5; margin:0 0 6px;">
                            © {{ date('Y') }} ShopZone. All rights reserved.
                        </p>
                        <p style="font-size:12px; color:#c3bcd6; margin:0;">
                            This is an automated email, no need to reply.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>