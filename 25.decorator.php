<?php

interface TwitterGatewayInterface
{
    public function getTweet(int $idTweet): string;
}

class TwitterGateway implements TwitterGatewayInterface
{
    public function getTweet(int $idTweet): string
    {
        // GET twitter.com/tweets/$idTweet
        // parse le json
        // renvoie le contenu du tweet
    }
}

class LoggableTwitterGateway implements TwitterGatewayInterface
{
    private LoggerInterface $logger;
    private TwitterGatewayInterface $actualTwitterGateway;

    public function __construct(LoggerInterface $logger, TwitterGatewayInterface $actualTwitterGateway)
    {
        $this->logger = $logger;
        $this->actualTwitterGateway = $actualTwitterGateway;
    }

    public function getTweet(int $idTweet): string
    {
        $this->logger->writeLine('A new twitter request was made.');
        return $this->actualTwitterGateway->getTweet($idTweet);
    }
}

class CacheableTwitterGateway implements TwitterGatewayInterface
{
    private CacheInterface $cache;
    private TwitterGatewayInterface $actualTwitterGateway;

    public function __construct(CacheInterface $cache, TwitterGatewayInterface $actualTwitterGateway)
    {
        $this->cache = $cache;
        $this->actualTwitterGateway = $actualTwitterGateway;
    }

    public function getTweet(int $idTweet): string
    {
        $cacheKey = 'tweet_'.$idTweet; // tweet_1234
        if($this->cache->has($cacheKey)) { // true
            return $this->cache->get($cacheKey); // '...'
        }

        $tweet = $this->actualTwitterGateway->getTweet($idTweet);
        $this->cache->store($cacheKey, $tweet); // tweet_1234 => '...'

        return $tweet; // '...'
    }
}

$cache = new FilesystemCache();
$logger = new Logger();

$twitter = new TwitterGateway();
$cacheableTwitter = new CacheableTwitterGateway($cache, $twitter);
$loggableTwitter = new LoggableTwitterGateway($logger, $cacheableTwitter);

$controller = new SocialNetworkController($cacheableTwitter);
$controller->index();

class SocialNetworkController
{
    private TwitterGatewayInterface $twitterGateway;

    public function __construct(
        TwitterGatewayInterface $twitterGateway
    )
    {
        $this->twitterGateway = $twitterGateway;
    }

    public function index()
    {
        // ...
        $tweet = $this->twitterGateway->getTweet(1234);
        // ...
    }
}