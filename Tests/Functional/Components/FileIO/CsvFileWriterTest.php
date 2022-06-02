<?php
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SawgImportExport\Tests\Functional\Components\FileIO;

use PHPUnit\Framework\TestCase;
use SwagImportExport\Components\FileIO\CsvFileWriter;
use SwagImportExport\Components\Utils\FileHelper;

class CsvFileWriterTest extends TestCase
{
    public const TEST_FILE = __DIR__ . '/test.csv';

    protected function tearDown(): void
    {
        \unlink(self::TEST_FILE);
    }

    public function testItShouldCreateCsv(): void
    {
        $exampleData = [['row1-column1', 'row1-column2']];

        $csvFileWriter = $this->createCsvFileWriter();
        $csvFileWriter->writeRecords(self::TEST_FILE, $exampleData);

        static::assertFileEquals(__DIR__ . '/_fixtures/created_csv_file.csv', self::TEST_FILE);
    }

    private function createCsvFileWriter(): CsvFileWriter
    {
        return new CsvFileWriter(new FileHelper());
    }
}
