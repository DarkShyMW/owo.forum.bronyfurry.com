<?php

namespace PHPSTORM_META {
    override(\OWO\Widget::widget(0), map([
        '' => '@'
    ]));

    exitPoint(\OWO\Widget\Response::redirect());
    exitPoint(\OWO\Widget\Response::throwContent());
    exitPoint(\OWO\Widget\Response::throwFile());
    exitPoint(\OWO\Widget\Response::throwJson());
    exitPoint(\OWO\Widget\Response::throwXml());
    exitPoint(\OWO\Widget\Response::goBack());

    override(\Widget\Options::__get(0), map([
        'feedUrl'               =>  string,
        'feedRssUrl'            =>  string,
        'feedAtomUrl'           =>  string,
        'commentsFeedUrl'       =>  string,
        'commentsFeedRssUrl'    =>  string,
        'commentsFeedAtomUrl'   =>  string,
        'xmlRpcUrl'             =>  string,
        'index'                 =>  string,
        'siteUrl'               =>  string,
        'routingTable'          =>  \ArrayObject::class,
        'rootUrl'               =>  string,
        'themeUrl'              =>  string,
        'pluginUrl'             =>  string,
        'adminUrl'              =>  string,
        'loginUrl'              =>  string,
        'loginAction'           =>  string,
        'registerUrl'           =>  string,
        'registerAction'        =>  string,
        'profileUrl'            =>  string,
        'logoutUrl'             =>  string,
        'serverTimezone'        =>  int,
        'contentType'           =>  string,
        'software'              =>  string,
        'version'               =>  string,
        'markdown'              =>  int,
        'allowedAttachmentTypes'=>  \ArrayObject::class
    ]));

    override(\OWO\Widget::__get(0), map([
        'sequence' => int,
        'length'   => int
    ]));
}
