<?php

namespace Goldfinch\Component\Products\Commands;

use Symfony\Component\Finder\Finder;
use Goldfinch\Taz\Services\InputOutput;
use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Question\ChoiceQuestion;

#[AsCommand(name: 'vendor:component-products:templates')]
class ComponentProductsTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-products:templates';

    protected $description = 'Publish component-products templates into your theme folder';

    protected function execute($input, $output): int
    {
        $io = new InputOutput($input, $output);

        $themes = Finder::create()
            ->in(THEMES_PATH)
            ->depth(0)
            ->directories();

        $ssTheme = null;

        if (!$themes || !$themes->count()) {
            $io->text('Themes not found');

            return Command::SUCCESS;
        } elseif ($themes->count() > 1) {
            // choose theme

            $availableThemes = [];

            foreach ($themes as $theme) {
                $availableThemes[] = $theme->getFilename();
            }

            $helper = $this->getHelper('question');
            $question = new ChoiceQuestion(
                'Which templete?',
                $availableThemes,
                0,
            );
            $question->setErrorMessage('Theme %s is invalid.');
            $theme = $helper->ask($input, $output, $question);
        } else {
            foreach ($themes as $themeItem) {
                $theme = $themeItem->getFilename();
            }
        }

        if (isset($theme) && $theme) {
            $this->copyTemplates($theme);

            $io->right('The [component-products] templates have been created');

            return Command::SUCCESS;
        }

        $io->wrong('The [component-products] templates creation failed');
    }

    private function copyTemplates($theme)
    {
        $fs = new Filesystem();

        $fs->copy(
            BASE_PATH .
                '/vendor/goldfinch/component-products/templates/Goldfinch/Component/Products/Blocks/ProductsBlock.ss',
            'themes/' .
                $theme .
                '/templates/Goldfinch/Component/Products/Blocks/ProductsBlock.ss',
        );

        $fs->copy(
            BASE_PATH .
                '/vendor/goldfinch/component-products/templates/Goldfinch/Component/Products/Models/Nest/ProductItem.ss',
            'themes/' .
                $theme .
                '/templates/Goldfinch/Component/Products/Models/Nest/ProductItem.ss',
        );

        $fs->copy(
            BASE_PATH .
                '/vendor/goldfinch/component-products/templates/Goldfinch/Component/Products/Pages/Nest/Products.ss',
            'themes/' .
                $theme .
                '/templates/Goldfinch/Component/Products/Pages/Nest/Products.ss',
        );
    }
}
