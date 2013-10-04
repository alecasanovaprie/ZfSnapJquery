<?php

namespace ZfSnapJquery\Libraries;

/**
 * Jqueryui
 *
 * @author Witold Wasiczko <witold@wasiczko.pl>
 */
class Jqueryui implements LibraryIterface
{
    const CDN_JQUERY_SCRIPT = 'http://code.jquery.com/ui/%s/jquery-ui.js';
    const CDN_JQUERY_STYLE = 'http://code.jquery.com/ui/%s/themes/%s/jquery-ui.css';
    const CDN_SCRIPT_DEFAULT = self::CDN_JQUERY_SCRIPT;
    const CDN_STYLE_DEFAULT = self::CDN_JQUERY_STYLE;
    const VERSION_DEFAULT = '1.10.3';
    const THEME_DEFAULT = 'smoothness';

    /**
     * @var bool
     */
    private $enabled = true;

    /**
     * @var string
     */
    private $version = self::VERSION_DEFAULT;

    /**
     * @var string
     */
    private $cdnScript = self::CDN_SCRIPT_DEFAULT;

    /**
     * @var string
     */
    private $cdnStyle = self::CDN_STYLE_DEFAULT;

    /**
     * @var string
     */
    private $theme = self::THEME_DEFAULT;

    /**
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param string $theme
     * @return Jqueryui
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
        return $this;
    }

    /**
     * @return string
     */
    public function getCdnStyle()
    {
        return $this->cdnStyle;
    }

    /**
     *
     * @param string $cdnStyle
     * @return Jqueryui
     */
    public function setCdnStyle($cdnStyle)
    {
        $this->cdnStyle = $cdnStyle;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     * @return Jqueryui
     */
    public function setEnabled($enabled = true)
    {
        $this->enabled = (bool) $enabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return Jqueryui
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getCdnScript()
    {
        return $this->cdnScript;
    }

    /**
     *
     * @param string $cdnScript
     * @return Jqueryui
     */
    public function setCdnScript($cdnScript)
    {
        $this->cdnScript = $cdnScript;
        return $this;
    }

    /**
     * @return array|string|null
     */
    public function getScripts()
    {
        if ($this->isEnabled()) {
            $script = $this->getCdnScript();
            if (strpos($script, '%s') === false) {
                return $script;
            }
            return sprintf($script, $this->getVersion());
        }
        return null;
    }

    /**
     * @return array|string|null
     */
    public function getStyles()
    {
        if ($this->isEnabled()) {
            $style = $this->getCdnScript();
            if (strpos($style, '%s') === false) {
                return $style;
            }
            return sprintf($style, $this->getVersion(), $this->getTheme());
        }
        return null;
    }
}
