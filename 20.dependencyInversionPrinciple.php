<?php

final class A {
    public function __construct(
        private InitializerInterface $initializer,
        private ProcessorInterface $processor,
        private CleanerInterface $cleaner,
        private EventDispatcherInterface $dispatcher,
    )
    {
    }

    public function doSomething()
    {

        $this->dispatcher->dispatchEvent(new BeforeDoSomethingEvent());

        $this->initializer->initialize();

        $this->processor->process();

        $this->cleaner->clean();

        $this->dispatcher->dispatchEvent(new AfterDoSomethingEvent());

    }
}

$dispatcher->listen(BeforeDoSomethingEvent::class, function() {
   if($firewall->hasAccess())
});
class Firewall
{
    public function hasAccess(): bool
    {}
}

$initializer = new ProdInitializer();
$processor = new Processor();
$cleaner = new Cleaner();

$a = new A(
    $initializer,
    $processor,
    $cleaner,
);

interface InitializerInterface {
    public function initialize();
}

class DevInitializer implements InitializerInterface {
    public function initialize()
    {
        // initialiser
    }
}

class ProdInitializer implements InitializerInterface {
    public function initialize()
    {
        // initialiser
    }
}

interface ProcessorInterface {
    public function process();
}

class Processor implements ProcessorInterface {
    public function process()
    {
        // traiter
    }
}

interface CleanerInterface {
    public function clean();
}
class Cleaner implements CleanerInterface {
    public function clean()
    {
        // nettoyer
    }
}
