<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerLSxNGqA\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerLSxNGqA/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerLSxNGqA.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerLSxNGqA\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerLSxNGqA\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'LSxNGqA',
    'container.build_id' => 'bd8ef3b6',
    'container.build_time' => 1634035643,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerLSxNGqA');
