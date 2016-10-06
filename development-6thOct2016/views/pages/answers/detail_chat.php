<rn:meta title="#rn:php:SEO::getDynamicTitle('answer', getUrlParm('a_id'))#" template="chat.php" answer_details="true" clickstream="answer_view"/>
<?php
	$p_li = getUrlparm('p_li');
	$a_id = getUrlparm('a_id');
?>
<img src="/euf/assets/images/Oncor_2color_RGB.jpg" alt="Oncor" title="Oncor" width="185px" />

<div id="rn_PageTitle_DetailChat" class="rn_AnswerDetail">
	<h1 id="rn_Summary"><rn:field name="answers.summary" highlight="true"/></h1>
</div>
<rn:widget path="custom/input/AnchorDisplay" />
<div id="rn_PageContent" class="rn_AnswerDetail">
    <rn:field name="answers.description" highlight="true"/>
   <div id="rn_AnswerText">
        <rn:field name="answers.solution" highlight="true"/>
    </div>
    <rn:widget path="custom/chat/ChatCustomIframe" />
</div>
