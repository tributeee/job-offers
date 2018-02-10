@extends('emails.layout.layout')

@section('content')
    <tr>
        <td valign="top" id="templateHeader">
            <table class="mcnTextBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody class="mcnTextBlockOuter">
                <tr>
                    <td class="mcnTextBlockInner" style="padding-top:50px;" valign="top">
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
                                <td class="mcnTextContent" style="padding: 0px 40px 9px;color: #25292E;" valign="top">
                                    <h1 class="null" style="text-align: center;">{{ $offer->title }}</h1>


                                    <div style="text-align: center;">
                                        <br> Posted by: {{ $offer->email }}
                                        <br> &nbsp;
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
                                            {{ $offer->description }}
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

            @include('emails.partials.button', [
                'text' => 'Publish',
                'url' => config('app.url') . '/' . $offer->id . '/publish'
            ])

            @include('emails.partials.button', [
                'text' => 'Mark Spam',
                'url' =>  config('app.url') . '/' . $offer->id . '/mark-spam'
            ])

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
                                            Note: You have to be logged in to app to publish or mark this job offer as a spam.
                                            If you are not logged in, please log in using <a href="{{ config('app.url') . '/login' }}">this url.</a>
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

            <table class="mcnDividerBlock" style="min-width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody class="mcnDividerBlockOuter">
                <tr>
                    <td class="mcnDividerBlockInner" style="min-width:100%; padding:18px 40px;">
                        <table class="mcnDividerContent" style="min-width: 100%;border-top: 2px solid #EAEAEA;" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                            <tr>
                                <td>
                                    <span></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!--
                        <td class="mcnDividerBlockInner" style="padding: 18px;">
                        <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
                        -->
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection
