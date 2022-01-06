<?php
namespace Drupal\ab_inbev_afr_sfmc_documentation;

use Drupal;
use Drupal\Core\Datetime\DrupalDateTime;

class DocumentationRepository{


  /**
   * @param $email
   * @return array|bool
   */
  public static function checkEmailExist($email){
    $query = \Drupal::database()->select('ab_inbev_afr_sfmc_documentation', 'd')
      ->fields('d')
      ->condition('email', $email);
    $result = $query->execute()->fetchAssoc();
    return $result;
  }

  /**
   * @param $firstname
   * @param $lastname
   * @param $birthdate
   * @param $email
   * @param $phone
   * @param $gender
   * @param $terms_conditions_and_privacy_policy
   * @param $marketing
   * @return Drupal\Component\Render\FormattableMarkup|Drupal\Core\StringTranslation\TranslatableMarkup|string
   */
  public static function insertUser($firstname, $lastname, $birthdate, $email, $phone, $gender, $terms_conditions_and_privacy_policy, $marketing){
    try{
      $time = Drupal::time()->getRequestTime();
      $birthdate_timestamp_temp = new DrupalDateTime($birthdate);
      $birthdate_timestamp = $birthdate_timestamp_temp->getTimestamp();
      $user_data = [
        'created' => $time,
        'updated' => null,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'birthdate' => $birthdate_timestamp,
        'email' => $email,
        'phone' => $phone,
        'gender' => $gender,
        'terms_conditions_and_privacy_policy' => $terms_conditions_and_privacy_policy,
        'marketing' => $marketing
      ];
      try{
        $insert_user = \Drupal::database()->insert('ab_inbev_afr_sfmc_documentation')
          ->fields($user_data)
          ->execute();
        if($insert_user)
          $response = t('Registered user');
      }
      catch(\Exception $e){
        $response = t('Unregistered user. Reason: ') . $e->getMessage();
      }
    }
    catch(\Exception $e){
      $response = t('Unregistered user. Reason: ') . $e->getMessage();
    }

    return $response;
  }
}
