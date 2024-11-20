<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\OSPanel\home\nette.loc\app\UI\User/activate.latte */
final class Template_c25b414d42 extends Latte\Runtime\Template
{
	public const Source = 'D:\\OSPanel\\home\\nette.loc\\app\\UI\\User/activate.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}
	}
}
