<?php

/**
 * sfValidatedFile represents a validated uploaded file.
 *
 * @package    symfony
 * @subpackage validator
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfValidatedFile.class.php 30915 2010-09-15 17:10:37Z Kris.Wallsmith $
 */
class pfValidatedThumbnailableImage extends sfValidatedFile
{
  /**
   * Saves the uploaded file.
   *
   * This method can throw exceptions if there is a problem when saving the file.
   *
   * If you don't pass a file name, it will be generated by the generateFilename method.
   * This will only work if you have passed a path when initializing this instance.
   *
   * @param  string $file      The file path to save the file
   * @param  int    $fileMode  The octal mode to use for the new file
   * @param  bool   $create    Indicates that we should make the directory before moving the file
   * @param  int    $dirMode   The octal mode to use when creating the directory
   *
   * @return string The filename without the $this->path prefix
   *
   * @throws Exception
   */
  public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777)
  {
    if (null === $file)
    {
      $file = $this->generateFilename();
    }

    if ($file[0] != '/' && $file[0] != '\\' && !(strlen($file) > 3 && ctype_alpha($file[0]) && $file[1] == ':' && ($file[2] == '\\' || $file[2] == '/')))
    {
      if (null === $this->path)
      {
        throw new RuntimeException('You must give a "path" when you give a relative file name.');
      }

      $file_name = $file;
      $file = $this->path.DIRECTORY_SEPARATOR.$file;
    }

    // get our directory path from the destination filename
    $directory = dirname($file);

    if (!is_readable($directory))
    {
      if ($create && !@mkdir($directory, $dirMode, true))
      {
        // failed to create the directory
        throw new Exception(sprintf('Failed to create file upload directory "%s".', $directory));
      }

      // chmod the directory since it doesn't seem to work on recursive paths
      chmod($directory, $dirMode);
    }

    if (!is_dir($directory))
    {
      // the directory path exists but it's not a directory
      throw new Exception(sprintf('File upload path "%s" exists, but is not a directory.', $directory));
    }

    if (!is_writable($directory))
    {
      // the directory isn't writable
      throw new Exception(sprintf('File upload path "%s" is not writable.', $directory));
    }

    // copy the temp file to the destination file
    copy($this->getTempName(), $file);

    // chmod our file
    chmod($file, $fileMode);

    //Создаем thumbnail
    $thumb_width  = sfConfig::get('app_thumbnail_width',  100);
    $thumb_height = sfConfig::get('app_thumbnail_height', 100);
    $thumbnail = new sfThumbnail($thumb_width, $thumb_height, true, true, 100, 'sfImageMagickAdapter');
    $thumbnail->loadFile($file);
    $thumb_file_name = $directory.DIRECTORY_SEPARATOR . 'thumb_' . $file_name;
    $thumbnail->save($thumb_file_name);
    
    chmod($thumb_file_name, $fileMode);
    
    $this->savedName = $file;

    return null === $this->path ? $file : str_replace($this->path.DIRECTORY_SEPARATOR, '', $file);
  }
}
