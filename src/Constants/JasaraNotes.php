<?php

namespace Jasara\AmznSPA\Constants;

/**
 * A list of developer notes related to unusual or confusing errors.
 */
class JasaraNotes
{
    public const NOTES_MAP = [
        'The application isn\'t configured with roles.' => 'Your developer application listing on Seller Central has been approved but not published yet. It takes up to 10 days for an application to fully publish after approval. This applies to listing revisions as well. See this Github issue for more details: https://github.com/amzn/selling-partner-api-docs/issues/347#issuecomment-855153228',
        'Invalid partyId' => 'The Seller ID for this Seller is not valid.',
    ];

    public static function findNote(string $error_message): string | null
    {
        $error_message = json_decode('"' . $error_message . '"'); // Decode Unicode

        foreach (self::NOTES_MAP as $key => $note) {
            if (str_contains($error_message, $key)) {
                return $note;
            }
        }

        return null;
    }
}
