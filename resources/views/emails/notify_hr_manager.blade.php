@extends('emails.layout.layout')

@section('content')
    <tr>
        <td valign="top" id="templateBody">
            <table class="mcnTextBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody class="mcnTextBlockOuter">
                <tr>
                    <td class="mcnTextBlockInner" style="padding-top:9px;" valign="top">
                        <!--[if mso]>
                        <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                            <tr>
                        <![endif]-->

                        <!--[if mso]>
                        <td valign="top" width="600" style="width:600px;">
                        <![endif]-->
                        <table style="max-width:100%; min-width:100%;" class="mcnTextContentContainer" width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
                            <tbody>
                            <tr>

                                <td class="mcnTextContent" style="padding: 0px 40px 9px;color: #05292E;" valign="top">

                                    <div style="text-align: center;"><span style="font-size:13px">
                                                    Your job offer <b>{{ $title }}</b> {{ $status }}!
                                                </span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!--[if mso]>
                        </td>
                        <![endif]-->

                        <!--[if mso]>
                        </tr>
                        </table>
                        <![endif]-->
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection