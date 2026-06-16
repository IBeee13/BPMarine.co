<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body style="margin:0; padding:0; background-color:#EEEEF5; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:48px 20px; background-color:#EEEEF5;">
        <tr>
            <td align="center">
                <table width="580" cellpadding="0" cellspacing="0" style="max-width:580px; width:100%;">

                    {{-- Top Label --}}
                    <tr>
                        <td style="padding-bottom:12px;" align="center">
                            <p
                                style="margin:0; font-size:10px; color:#5B6275; letter-spacing:3px; text-transform:uppercase;">
                                BP Marine Co · Inquiry Notification</p>
                        </td>
                    </tr>

                    {{-- Main Card --}}
                    <tr>
                        <td
                            style="background-color:#FCFCFF; border:1px solid #BBBCCB; border-radius:4px; overflow:hidden;">

                            {{-- Header --}}
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="background-color:#18254D; padding:36px 40px 28px;">

                                        {{-- Logo Perusahaan --}}
                                        <table cellpadding="0" cellspacing="0" style="margin-bottom:20px;">
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('img/Aset/apple-touch-icon.png') }}"
                                                        alt="BP Marine Co" width="120" height="auto"
                                                        style="display:block; width:120px; height:auto;">
                                                </td>
                                            </tr>
                                        </table>

                                        <p
                                            style="margin:0 0 6px; font-size:10px; color:#C7A578; letter-spacing:3px; text-transform:uppercase;">
                                            New Inquiry Received</p>
                                        <h1
                                            style="margin:0 0 16px; font-size:26px; font-weight:700; color:#FCFCFF; line-height:1.3;">
                                            {{ $data['subject'] }}
                                        </h1>

                                        {{-- Timestamp Badge --}}
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td
                                                    style="background-color:#0f1a38; border:1px solid #2d4080; border-radius:999px; padding:5px 14px;">
                                                    <p
                                                        style="margin:0; font-size:11px; color:#BBBCCB; letter-spacing:0.5px;">
                                                        🕐 {{ now()->format('D, d M Y · H:i') }} WIB
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>

                            {{-- Accent Line --}}
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="height:3px; background: linear-gradient(90deg, #C7A578, #18254D);"></td>
                                </tr>
                            </table>

                            {{-- Sender Info Card --}}
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td
                                        style="padding:24px 40px; background-color:#F9F9F9; border-bottom:1px solid #E4E5F2;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                {{-- Avatar --}}
                                                <td width="48" valign="top">
                                                    <div
                                                        style="width:44px; height:44px; background-color:#18254D; border-radius:999px; text-align:center; justify-content: center; line-height:44px;">
                                                        <span style="font-size:18px; color:#C7A578; font-weight:700;">
                                                            {{ strtoupper(substr($data['name'], 0, 1)) }}
                                                        </span>
                                                    </div>
                                                </td>
                                                {{-- Name & Email --}}
                                                <td style="padding-left:14px;" valign="middle">
                                                    <p
                                                        style="margin:0; font-size:15px; font-weight:700; color:#18254D;">
                                                        {{ $data['name'] }}</p>
                                                    <p style="margin:3px 0 0; font-size:12px; color:#5B6275;">
                                                        {{ $data['email'] }}</p>
                                                </td>
                                                {{-- Country Badge --}}
                                                <td align="right" valign="middle">
                                                    @if(!empty($data['country']))
                                                        <span
                                                            style="background-color:#E4E5F2; color:#18254D; font-size:11px; font-weight:600; padding:4px 12px; border-radius:999px; letter-spacing:0.5px;">
                                                            {{ $data['country'] }}
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            {{-- Details Grid --}}
                            <table width="100%" cellpadding="0" cellspacing="0">
                                {{-- Phone & Company --}}
                                <tr>
                                    <td width="50%"
                                        style="padding:20px 40px 20px 40px; border-bottom:1px solid #E4E5F2; border-right:1px solid #E4E5F2;">
                                        <p
                                            style="margin:0; font-size:10px; color:#5B6275; text-transform:uppercase; letter-spacing:1.5px;">
                                            📞 Phone</p>
                                        <p style="margin:6px 0 0; font-size:14px; color:#18254D; font-weight:500;">
                                            {{ $data['phone'] ?? '-' }}</p>
                                    </td>
                                    <td width="50%"
                                        style="padding:20px 24px 20px 24px; border-bottom:1px solid #E4E5F2;">
                                        <p
                                            style="margin:0; font-size:10px; color:#5B6275; text-transform:uppercase; letter-spacing:1.5px;">
                                            🏢 Company</p>
                                        <p style="margin:6px 0 0; font-size:14px; color:#18254D; font-weight:500;">
                                            {{ $data['company'] ?? '-' }}</p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Message --}}
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding:28px 40px;">
                                        <p
                                            style="margin:0 0 12px; font-size:10px; color:#5B6275; text-transform:uppercase; letter-spacing:1.5px;">
                                            💬 Message</p>
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td
                                                    style="background-color:#F9F9F9; border-left:3px solid #C7A578; border-radius:0 4px 4px 0; padding:16px 20px;">
                                                    <p
                                                        style="margin:0; font-size:14px; color:#18254D; line-height:1.8; white-space:pre-line;">
                                                        {{ $data['message'] }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            {{-- Reply Button --}}
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding:0 40px 36px;" align="center">
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="background-color:#C7A578; border-radius:999px;">
                                                    <a href="mailto:{{ $data['email'] }}?subject=Re: {{ urlencode($data['subject']) }}"
                                                        style="display:inline-block; color:#FCFCFF; text-decoration:none; font-size:13px; font-weight:700; padding:13px 36px; letter-spacing:1px; text-transform:uppercase;">
                                                        Reply to {{ $data['name'] }} →
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="padding:20px 0;" align="center">
                            <p style="margin:0; font-size:11px; color:#5B6275;">
                                <strong style="color:#18254D;">BP Marine Co</strong> · Bulukumba, South Sulawesi
                            </p>
                            <p style="margin:4px 0 0; font-size:10px; color:#BBBCCB;">
                                This notification was automatically sent from your website contact form.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>