<rn:meta title="#rn:php:SEO::getDynamicTitle('answer', getUrlParm('a_id'))#" template="oncor.php" answer_details="true" clickstream="answer_view"/>

<div id="rn_PageTitle" class="rn_AnswerDetail">
    <h1 id="rn_Summary"><rn:field name="answers.summary" highlight="true"/></h1>
    <div id="rn_AnswerInfo">
        #rn:msg:PUBLISHED_LBL# <rn:field name="answers.created" />
        &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        #rn:msg:UPDATED_LBL# <rn:field name="answers.updated" />
    </div>
    <rn:field name="answers.description" highlight="true"/>
</div>
<div id="rn_PageContent" class="rn_AnswerDetail">
    <div id="rn_AnswerText">
        <rn:field name="answers.solution" highlight="true"/>
    </div>
    <rn:widget path="knowledgebase/GuidedAssistant" label_text_result=""/>
    <div id="rn_FileAttach">
        <rn:widget path="output/DataDisplay" name="answers.fattach" />
    </div>
    <rn:widget path="feedback/AnswerFeedback2" options_count="2" />
    <br/>
    <rn:widget path="knowledgebase/RelatedAnswers2" />
    <rn:widget path="knowledgebase/PreviousAnswers2" />
    <rn:condition is_spider="false">
        <div id="rn_DetailTools">
            <rn:widget path="utils/SocialBookmarkLink" sites= "Delicious > Post to Delicious > http://del.icio.us/post?url=|URL|&title=|TITLE|,
				Digg > Post to Digg > http://digg.com/submit?url=|URL|&title=|TITLE|,
				Facebook > Post to Facebook > http://facebook.com/sharer.php?u=|URL|,
				Reddit > Post to Reddit > http://reddit.com/submit?url=|URL|&title=|TITLE|,
				StumbleUpon > Post to StumbleUpon > http://stumbleupon.com/submit?url=|URL|&title=|TITLE|,
				Twitter > Tweet this > http://twitter.com/home?status=|TITLE|+|URL|"/>
            <rn:widget path="utils/PrintPageLink" />
            <rn:widget path="utils/EmailAnswerLink" />
            <rn:widget path="notifications/AnswerNotificationIcon3" />
        </div>
    </rn:condition>
</div>


<rn:widget path="custom/utils/PrintHeadCss"/>
<rn:widget path="custom/knowledgebase/security"/>
