<!DOCTYPE html>
<html lang="#rn:language_code#">
<rn:meta clickstream="chat_landing" include_chat="true"/>
<head>
    <title>#rn:msg:LIVE_ASSISTANCE_LBL#</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--[if lt IE 9]><script type="text/javascript" src="/euf/rightnow/html5.js"></script><![endif]-->
    <meta charset="utf-8"/>
      <rn:theme path="/euf/assets/themes/standard" css="site.css, 
       {YUI}/widget-stack/assets/skins/sam/widget-stack.css,
       {YUI}/widget-modality/assets/skins/sam/widget-modality.css,
       {YUI}/overlay/assets/overlay-core.css,
       {YUI}/panel/assets/skins/sam/panel.css" />
    <rn:head_content/>
    <link rel="icon" href="/euf/assets/images/favicon.png" type="image/png">
</head>
<body class="yui-skin-sam yui3-skin-sam">
    <div id="rn_ChatContainer">
        <div id="rn_PageContent" class="rn_Live">
            <div class="rn_Padding" >
                <div id="rn_ChatDialogContainer">
                    <rn:widget path="chat/ChatOffTheRecordDialog"/>
                    <div id="rn_ChatDialogHeaderContainer">
                        <div id="rn_ChatDialogTitle" class="rn_FloatLeft"><h3>#rn:msg:CHAT_LBL#</h3></div>
                        <div id="rn_ChatDialogHeaderButtonContainer">
                            <rn:widget path="standard/chat/ChatDisconnectButton" close_icon_path="images/chat_close.png" />
                            <rn:widget path="standard/chat/ChatOffTheRecordButton"/>
                            <rn:widget path="standard/chat/ChatPrintButton"/>
                            <rn:widget path="standard/chat/ChatSoundButton"/>
                        </div>
                    </div>
                    <rn:widget path="standard/chat/ChatServerConnect"/>
                    <rn:widget path="standard/chat/ChatEngagementStatus"/>
                    <rn:widget path="standard/chat/ChatQueueWaitTime" type="all"
                            label_estimated_wait_time_not_available=""
                            label_average_wait_time_not_available=""/>
                    <rn:widget path="standard/chat/ChatAgentStatus"/>
                    <rn:widget path="standard/chat/ChatTranscript" unread_messages_titlebar_enabled="true"/>
                    <div id="rn_PreChatButtonContainer">
                        <rn:widget path="standard/chat/ChatCancelButton"/>
                        <rn:widget path="standard/chat/ChatRequestEmailResponseButton"/>
                    </div>
                    <rn:widget path="standard/chat/ChatPostMessage"/>
                    <div id="rn_InChatButtonContainer">
                        <rn:widget path="standard/chat/ChatSendButton"/>
                        <rn:widget path="standard/chat/ChatAttachFileButton"/>
                        <rn:widget path="standard/chat/ChatCoBrowseButton"/>
                    </div>
                    <div id="rn_ChatQueueSearchContainer">
                        <rn:widget path="standard/chat/ChatQueueSearch" popup_window="true"/>
                    </div>
                </div>
            </div>
        </div>
        <rn:widget path="custom/chat/PostChatSurveyURL" survey_url="https://oncor.az1.qualtrics.com/SE/?SID=SV_6P8PX4hAZ15ZKpn" />
        <div id="rn_ChatFooter">
            <div class="rn_FloatRight">
                <rn:widget path="utils/RightNowLogo"/>
            </div>
        </div>
    </div>
</body>
</html>
