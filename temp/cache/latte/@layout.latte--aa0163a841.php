<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\OSPanel\home\nette.loc\app\UI/@layout.latte */
final class Template_aa0163a841 extends Latte\Runtime\Template
{
	public const Source = 'D:\\OSPanel\\home\\nette.loc\\app\\UI/@layout.latte';

	public const Blocks = [
		['scripts' => 'blockScripts'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 7 */;
		echo '/css/style.css">
	<link rel="stylesheet" href="https://bootswatch.com/5/spacelab/bootstrap.min.css">

	<title>';
		if ($this->hasBlock('title')) /* line 10 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('stripHtml', $ʟ_fi, $s));
			}) /* line 10 */;
			echo ' | ';
		}
		echo 'Nette Web</title>
</head>

<body>
	

	<div class="container container-fluid">
		<div class="row">
';
		foreach ($flashes as $flash) /* line 18 */ {
			echo '			<div';
			echo ($ʟ_tmp = array_filter(['flash', $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 18 */;
			echo '>
				<div class="alert alert-success">';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 19 */;
			echo '</div>
			</div>
';

		}

		echo '
			<div class="menu">
				<ul class="nav my-3">
					<li class="nav-item"><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:')) /* line 24 */;
		echo '" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Home:dashboard')) /* line 25 */;
		echo '" class="nav-link">Dashboard</a></li>
				</ul>
			</div>
		</div>
	</div>

';
		$this->renderBlock('content', [], 'html') /* line 31 */;
		echo "\n";
		$this->renderBlock('scripts', get_defined_vars()) /* line 33 */;
		echo '</body>
</html>
';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '18'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block scripts} on line 33 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '	<script src="https://unpkg.com/nette-forms@3"></script>
';
	}
}
