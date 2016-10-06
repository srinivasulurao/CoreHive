<rn:meta title="#rn:msg:LOGIN_FAILED_HDG#" template="standard.php" />
<?
if($this->session->isRequired() && $this->session->getSessionData('cookiesEnabled') && getUrlParm('redirect'))
{
    $redirectLocation = urldecode(urldecode(getUrlParm('redirect')));
    $parsedURL = parse_url($redirectLocation);
    if($parsedURL['scheme'])
    {
        $data['js']['redirectOverride'] = $redirectLocation;
        header("Location: $redirectLocation");
        exit;
    }
    else
    {
        header("Location: /app/$redirectLocation");
        exit;
    }
}
else
{
    $this->session->destroyProfile();
    $externalLogin = getConfig(PTA_EXTERNAL_LOGIN_URL);
    if($externalLogin)
        $loginPage = $externalLogin;
    else

        $loginPage = '/app/' . getConfig(CP_LOGIN_URL) . sessionParm();
}
?>
<div id="rn_PageTitle" class="rn_CookieRequired">
    <h1>#rn:msg:COOKIES_ARE_REQUIRED_MSG#</h1>
</div>
<div id="rn_PageContent" class="rn_CookieRequired">
    <div class="rn_Padding">
        <p>#rn:msg:YOULL_ENABLE_COOKIES_BROWSER_BEF_MSG#</p>
        <a href="<?=$loginPage;?>">#rn:msg:BACK_TO_LOGIN_CMD#</a>
    </div>
</div>
