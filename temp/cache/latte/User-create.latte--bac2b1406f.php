<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\OSPanel\home\nette.loc\app\UI\User/create.latte */
final class Template_bac2b1406f extends Latte\Runtime\Template
{
	public const Source = 'D:\\OSPanel\\home\\nette.loc\\app\\UI\\User/create.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="container container-fluid">
    <div class="row">
        <h1>New user</h1>

';
		$ʟ_tmp = $this->global->uiControl->getComponent('createForm');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 6 */;

		echo '    </div>
</div>';
	}
}
