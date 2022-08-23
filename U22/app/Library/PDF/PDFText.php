<?php
namespace App\Library\PDF;

use setasign\Fpdi\Tcpdf\Fpdi;

class PDFText
{
    private string $font = 'kozgopromedium';
    private string $style = '';
    private int $font_size = 10;

    /** @var list<int> RGBKの順 */
    private array $color = [0, -1, -1, -1];
    private int $x;
    private int $y;
    private string $text;

    /**
     * @param array{
     *     ?font: string,
     *     ?style: string,
     *     ?font_size: int,
     *     ?color: list<int>
     * } $options
     */
    public function __construct(int $x, int $y, string $text, array $options = [])
    {
        $this->x = $x;
        $this->y = $y;
        $this->text = $text;

        $options_keys = [
            'font',
            'style',
            'font_size',
            'color',
        ];
        foreach ($options_keys as $key) {
            if (key_exists($key, $options)) {
                $this->$key = $options[$key];
            }
        }
    }

    public function with_texts(Fpdi $fpdi): Fpdi
    {
        $new = clone $fpdi;
        $new = $this->with_font($new);
        $new = $this->with_text_color($new);
        $new = $this->with_text($new);
        return $new;
    }

    private function with_font(Fpdi $fpdi): Fpdi
    {
        $new = clone $fpdi;
        $new->setFont($this->font, $this->style, $this->font_size);
        return $new;
    }

    private function with_text_color(Fpdi $fpdi): Fpdi
    {
        $new = clone $fpdi;
        $new->setTextColor($this->color[0] ?? 0, $this->color[1] ?? -1, $this->color[2] ?? -1, $this->color[3] ?? -1);
        return $new;
    }

    private function with_text(Fpdi $fpdi): Fpdi
    {
        $new = clone $fpdi;
        $new->Text($this->x, $this->y, $this->text);
        return $new;
    }
}
